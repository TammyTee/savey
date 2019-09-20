const mongoose = require('mongoose')
const Schema = mongoose.Schema
const BudgetItemSchema = Schema(
  {
    name: {type: String, required: true},
    day_due: {type: Number, required: false},
    expected_budget_amount: {type: Number, required: true},
    actual_budget_amount: {type: Number, required: false} // if not included ... default to expected amt
  },
  {timestamps: true}
)
const BudgetItem = mongoose.model('BudgetItem', BudgetItemSchema, 'BudgetItems')

module.exports = BudgetItem
