const db = require('../models')
const axios = require('axios')
const Products = db.products
const Users = db.users
const Brand = db.brands
const ExhibitSettings = db.exhibitsettings
const { downloadImage, loginBuyma, exhibitBuyma } = require('../global')

var user_id = 1
var keyword = ''
var min_price = 0
var max_price = 0
var category = 'all'
var loui_brand
const site_url = 'https://it.louisvuitton.com/'
// var catergory_list = ["Sneakers","T-Shirts", "Outerwear", "Bags", "Apparel", "Hoodies", "Bottoms", "Jewelry"];

var catergory_list = [
  { c_name: 'Regali per Lei', code: ['t2xc5ji', 'ti3pw6o'] },
  {
    c_name: 'In Evidenza',
    code: [
      't15yno67',
      't185un1v',
      //'t1x4rxgw'
    ],
  },
  {
    c_name: 'Borse da Donna',
    code: [
      'tic3lrz',
      'tkfqvgi',
      //'t10ujhxu',
      //'t1v6va27',
      'tp0i0jt',
      'tfr7qdp',
      'tbdtom7',
      't1qhwjt3',
      'tsrk38e',
      't1mb9cp',
      'tptbe01',
    ],
  },
  {
    c_name: 'Portafogli e Piccola Pelletteria',
    code: [
      't164iz3b',
      't1wnwc4o',
      'ttz8v5o',
      't11y8dds',
      'twzkl0p',
      'tngffj4',
      //'t1cwcr89',
      //'t1gq7ogr',
      //'tdf5akn',
      't1mb9cp',
      'tptbe01',
    ],
  },
  { c_name: 'Viaggio', code: ['t193qm0', 'tcn0cax', 'tdxhh3p', 'tbc3s3k'] },
  {
    c_name: 'Accessori',
    code: [
      't12h8cqk',
      't1lxxget',
      //'txozq8b',
      'tte63om',
      'toyetr6',
      'tmr7ugu',
      'tmixwg8',
      'ty346sh',
      't1peha6j',
      'tui7c0x',
      't1ydxwto',
      'tcd4ic8',
    ],
  },
  {
    c_name: 'Fashion Bijoux',
    code: ['t1retiqc', 'tqnlr03', 't1fwp6ww', 'tguaa6b', 't7sxnbc', 't175idqj'],
  },
  {
    c_name: 'Abbigliamento',
    code: [
      'tfrs2k1',
      'tv38arq',
      'to8aw9x',
      't12kgz5u',
      't17aneaj',
      't1m1g0yp',
      't1qw5yu7',
      't1ho800m',
      't79p2ft',
      //'t1y27qn9',
    ],
  },
  {
    c_name: 'Scarpe',
    code: [
      //'t9nspl0',
      //'trkubgg',
      't13nbknz',
      't1mcbujj',
      't1lkbycc',
      't1ey0zdr',
      't1is1ifz',
      't1wpeudq',
      //'t18l8jj3',
    ],
  },
  { c_name: 'Profumi', code: ['t1pipf2k', 't1tyjgl'] },
  {
    c_name: 'Gioielli',
    code: [
      't1bb8yvi',
      't1gbxdui',
      'txx2a43',
      //'t1kt9fww',
      't13mxv0j',
      'ttrfz62',
      't1mgthcy',
      'tkgeji0',
      't1unwhxs',
    ],
  },
  {
    c_name: 'Orologi',
    code: [
      't9nfgwi',
      'tc5t92d',
      //'t10d8fg1',
      //'t1tupfcg'
    ],
  },
  {
    c_name: 'Prodotti Personalizzabili',
    code: [
      't1x9bru',
      'te5j5ah',
      'txx2a43',
      //'t1s82963'
    ],
  },
]

var sn_now_page = 1

class SneakersInfo {
  res = {}
  constructor(data) {
    this.res = data
  }
  save_data() {
    Products.findAll({
      where: { product_id: this.res.product_id },
    })
      .then((data) => {
        console.log('data', data)
        if (data.length > 0) {
          Products.update(this.res, {
            where: { product_id: this.res.product_id },
          })
            .then((num) => {
              console.log('Update data Okay!', this.res)
            })
            .catch((err) => {
              console.log('Update data Failed! -1')
            })
        } else {
          Products.create(this.res)
            .then((num) => {
              console.log('Create data Okay')
            })
            .catch((err) => {
              console.log('Create data Failed! -2', err)
            })
        }
      })
      .catch((err) => {
        console.log('Error get item_list!', err)
      })
  }
}
var index = 0
function SneakersGetData(page) {
  var url =
    'https://api.louisvuitton.com/eco-eu/search-merch-eapi/v1/ita-it/plp/products/' +
    catergory_list[category]['code'][index] +
    '?page=' +
    page
  //console.log("URL >> ", index);

  // if(max_price > 0){
  // 	url +="&filters[lowest_price_cents]="+min_price+"-"+max_price;
  // }
  // console.log("URL >> ", url);

  axios
    .get(url, {})
    .then(async (response) => {
      var res = response.data.hits
      console.log(res)
      if (res.length > 0) {
        for (var i = 0; i < res.length; i++) {
          var insert_query = {}

          insert_query.site_url = site_url

          insert_query.product_id = res[i].productId
          //console.log("SnerksName:", insert_query.product_id);
          insert_query.product_img = res[i].image[0].contentUrl
          local_img = 'images/' + new Date().getTime() + '.jpg'
          await downloadImage(insert_query.product_img, local_img)
          insert_query.product_local_img = local_img
          insert_query.product_name = res[i].name
          insert_query.product_comment = res[i].disambiguatingDescription
          insert_query.category = catergory_list[category]['c_name']

          insert_query.brand = loui_brand.id

          insert_query.season_ = ''
          insert_query.theme_ = ''
          insert_query.size_color = res[i].color
          insert_query.delivery = ''
          insert_query.deadline = new Date()
          insert_query.place = ''
          insert_query.shop_name_ = 'LOUIS VUITTON'
          insert_query.shipping_place = ''

          var price = res[i].offers.priceSpecification[0].price.replace('€', '')
          price = price.replace(',', '.')

          //console.log(price);
          insert_query.product_price = price
          insert_query.normal_pirce_ = price
          insert_query.tariff_ = ''
          insert_query.exhibition_memo_ = ''
          insert_query.purchase_memo_ = ''
          insert_query.price_type = 'EUR'
          var sneak = new SneakersInfo(insert_query)
          sneak.save_data()
        }

        // sn_now_page++

        // SneakersGetData(sn_now_page)
      } else {
        if (index < catergory_list[category]['code'].length - 1) {
          index++
          SneakersGetData(sn_now_page)
        }
      }
    })
    .catch((err) => {
      if (index < catergory_list[category]['code'].length - 1) {
        index++
        SneakersGetData(sn_now_page)
      }
      console.log('Update data Failed!', err)
    })
}

exports.changeInfo = (req, res) => {}

exports.getInfo = async (req, res) => {
  try {
    if (req.query.sel > 0) {
      user_id = req.query.sel
      category = req.query.category
      loui_brand = await Brand.findOne({ where: { name: 'Louis Vuitton' } })
      if (loui_brand) {
      } else {
        loui_brand = await Brand.create({ name: 'Louis Vuitton' })
      }
      if (req.query.min_price > 0) min_price = req.query.min_price

      if (req.query.max_price > 0) max_price = req.query.max_price
      sn_now_page = 1
      index = 0
      SneakersGetData(sn_now_page)
    } else {
      console.log('Sel is 0!')
    }
  } catch (error) {
    console.log('Error loui getInfo!', error)
  }
}

exports.exhibit = (req, res) => {
  const { user_id } = req.body

  Products.findAll({
    where: { site_url },
  })
    .then(async (products) => {
      if (products.length) {
        const user = await Users.findOne({
          where: { id: user_id },
        })
        user.status = 'exhibit'
        await user.save()
        res.status(200).json({ success: false })
        const exhibitsettings = await ExhibitSettings.findOne({
          where: { user_id },
        })
        await loginBuyma()
        for (let i = 0; i < products.length; i++) {
          const success = await exhibitBuyma(
            products[i],
            i !== 0,
            exhibitsettings,
          )
        }
        user.status = 'init'
        await user.save()
      }
    })
    .catch((err) => {
      console.log('exhibit in loui error: ', err)
      res.status(500).json({ success: false, error: err })
    })
}
