const dbConfig = require('../config/db.config.js')
const Sequelize = require('sequelize')
const sequelize = new Sequelize(dbConfig.DB, dbConfig.USER, dbConfig.PASSWORD, {
  host: dbConfig.HOST,
  dialect: dbConfig.dialect,
  operatorsAliases: false,
  pool: {
    max: dbConfig.pool.max,
    min: dbConfig.pool.min,
    acquire: dbConfig.pool.acquire,
    idle: dbConfig.pool.idle,
  },
})
const db = {}
db.Sequelize = Sequelize
db.sequelize = sequelize
//const CustomPricePatterns = db.custom_price_patterns;
//const priceRevisions = db.price_revisions;
db.products = require('./products.model.js')(sequelize, Sequelize)
db.users = require('./users.model')(sequelize, Sequelize)
db.exhibitsettings = require('./exhibitsettings.model')(sequelize, Sequelize)
db.brands = require('./brand.model')(sequelize, Sequelize)
db.brands.hasMany(db.products, { as: 'pd', foreignKey: 'brand' })
db.products.belongsTo(db.brands, { as: 'bd', foreignKey: 'brand' })

module.exports = db
