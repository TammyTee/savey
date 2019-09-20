const mongoose = require('mongoose')
const Schema = mongoose.Schema
const BudgetCategorySchema = Schema(
  {
    name: {type: String, required: true},
    items: {type: Array, required: false}
  },
  {timestamps: true}
)
const BudgetCategory = mongoose.model('BudgetCategory', BudgetCategorySchema, 'BudgetCategories')

module.exports = BudgetCategory
