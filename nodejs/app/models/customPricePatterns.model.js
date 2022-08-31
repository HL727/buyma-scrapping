module.exports = (sequelize, Sequelize) => {
  const customPricePatterns = sequelize.define("custom_price_patterns", {
    display: {
      type: Sequelize.STRING
    },
    name: {
      type: Sequelize.STRING
    },
    color: {
      type: Sequelize.STRING
    },

    mode: {
      type: Sequelize.STRING
    },
    same_size: {
      type: Sequelize.STRING
    },
    pointer: {
      type: Sequelize.STRING
    },
    coupon: {
      type: Sequelize.STRING
    },
    post_price: {
      type: Sequelize.STRING
    },
    ignore: {
      type: Sequelize.STRING
    },
    user_id: {
      type: Sequelize.INTEGER
    },

  },
  { 
    timestamps: false
  });
  return customPricePatterns;
};