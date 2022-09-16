const db = require('../models')
const axios = require('axios')
const Products = db.products
const { downloadImage, loginBuyma, exhibitBuyma } = require('../global')

var user_id = 1
const url =
  'https://kpgnq6fji9-3.algolianet.com/1/indexes/*/queries?x-algolia-agent=Algolia%20for%20JavaScript%20(4.13.1)%3B%20Browser'
const site_url = 'https://www.dior.com'

class SneakersInfo {
  res = {}
  constructor(data) {
    this.res = data
  }
  save_data() {
    Products.findAll({
      where: { user_id: user_id, product_id: this.res.product_id, site_url },
    })
      .then((data) => {
        console.log('data', data)
        if (data.length > 0) {
          Products.update(this.res, {
            where: {
              user_id: user_id,
              product_id: this.res.product_id,
              site_url,
            },
          })
            .then((num) => {
              console.log('Update data Okay!')
            })
            .catch((err) => {
              console.log('Update data Failed! -1')
            })
        } else {
          Products.create(this.res)
            .then((num) => {
              console.log('Update data Okay!')
            })
            .catch((err) => {
              console.log('Update data Failed! -2')
            })
        }
      })
      .catch((err) => {
        console.log('Error get item_list!:', err)
      })
  }
}

function SneakersGetData(page, hitsPerPage, query) {
  console.log('URL >> ', url)

  axios({
    method: 'POST',
    url,
    data: {
      requests: [
        {
          query,
          indexName: 'dev_product_ja_jp',
          params: `clickAnalytics=true&page=${page}&hitsPerPage=${hitsPerPage}&facets=%5B%22universe%22%5D&filters=`,
        },
      ],
    },
    headers: {
      'x-algolia-api-key': '64e489d5d73ec5bbc8ef0d7713096fba',
      'x-algolia-application-id': 'KPGNQ6FJI9',
    },
  })
    .then(async (response) => {
      const results = response.data.results
      let hits
      if (results.length > 0) hits = results[0].hits

      for (var i = 0; i < hits.length; i++) {
        var insert_query = {}

        insert_query.user_id = user_id
        insert_query.site_url = site_url

        insert_query.product_id = hits[i].id
        //console.log("SnerksName:", insert_query.product_id);
        insert_query.product_img = hits[i].image
        local_img = 'images/' + new Date().getTime() + '.jpg'
        await downloadImage(insert_query.product_img, local_img)
        insert_query.product_local_img = local_img
        insert_query.product_name = hits[i].name
        insert_query.product_comment = hits[i].description
        insert_query.category = hits[i].categories_int.join('/')

        insert_query.brand = ''

        insert_query.season_ = ''
        insert_query.theme_ = ''
        insert_query.size_color = ''
        insert_query.delivery = ''
        insert_query.deadline = ''
        insert_query.place = ''
        insert_query.shop_name_ = ''
        insert_query.shipping_place = ''
        insert_query.product_price = hits[i].price.value
        insert_query.normal_pirce_ = hits[i].minimumPrice.amount
        insert_query.tariff_ = ''
        insert_query.exhibition_memo_ = ''
        insert_query.purchase_memo_ = ''
        insert_query.price_type = 'JPY'

        var sneak = new SneakersInfo(insert_query)
        await sneak.save_data()
      }
      //console.log("++++++++++++++++++++++++++++++++++++++++++++++++++++++", page);
      //   page++

      //   SneakersGetData(page, hitsPerPage, query)
    })
    .catch((err) => {
      console.log('Update data Failed!: ', err)
    })
}

const getInfo = (req, res) => {
  try {
    if (req.query.sel > 0) {
      user_id = req.query.sel
      const keyword = req.query.keyword
      SneakersGetData(0, 25, keyword)
    }
    res.status(200).json({ success: true })
  } catch (err) {
    console.log('get info error in dior: ', err)
    res.status(500).json({ success: false, error: err })
  }
}

const exhibit = (req, res) => {
  Products.findAll({
    where: { user_id, site_url },
  })
    .then(async (products) => {
      if (products.length) {
        await loginBuyma()
        for (let i = 0; i < products.length; i++) {
          await exhibitBuyma(products[i], i !== 0)
        }
        res.status(200).json({ success: true })
      }
    })
    .catch((err) => {
      console.log('exhibit in dior error: ', err)
      res.status(500).json({ success: false, error: err })
    })
}
module.exports = {
  getInfo,
  exhibit,
}
