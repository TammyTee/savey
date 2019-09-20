// TUT: https://dzone.com/articles/fullstack-vue-app-with-node-express-and-mongodb,
// https://medium.com/@anaida07/mevn-stack-application-part-1-3a27b61dcae0
'use strict'
const express = require('express')
const app = express()
const mongoose = require('mongoose')
const cors = require('cors')
const bodyParser = require('body-parser')
// const bcrypt = require('bcrypt')

// models
const BudgetCategory = require('./app/BudgetCategory')
// const BudgetItem = require('./app/BudgetItem')

// const budgetData = []

// connect server to mongoDB
mongoose.connect('mongodb://localhost:27017/budget_app', {
  useNewUrlParser: true,
  useCreateIndex: true,
  useUnifiedTopology: true
})

mongoose.connection.on('error', console.error.bind(console, 'connection error:'))
mongoose.connection.on('open', () => {
  console.log('Connected to mongo server')
  // trying to get collections
  mongoose.connection.db.listCollections().toArray(function (err, names) {
    if (err) return console.log('Error while getting budget app collections!')
    console.log(names) // [{ name: 'dbname.myCollection' }]
    // module.exports.Collection = names
  })
})
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true }))
app.use(cors())

// retrieve all API data
app.get('/api/budget', (req, res) => {
})

// retrieves all the notes
app.get('/api/budget/list', (req, res) => {
  BudgetCategory.find({}).sort({updatedAt: 'descending'}).exec((err, budgetCategories) => {
    if (err) return res.status(404).send('Error while getting budget categories!')
    return res.send({budgetCategories})
  })
})

// create a new note
app.post('/api/note/create', (req, res) => {
  const budgetCategory = new BudgetCategory({body: req.body.body, title: req.body.title})
  budgetCategory.save((err) => {
    if (err) return res.status(404).send({message: err.message})
    return res.send({ budgetCategory })
  })
})

// update an existing note with the given object id
app.post('/api/budget/update/:id', (req, res) => {
  let options = { new: true }
  BudgetCategory.findByIdAndUpdate(req.params.id, req.body.data, options, (err, budgetCategory) => {
    if (err) return res.status(404).send({message: err.message})
    return res.send({ message: 'budget category updated!', budgetCategory })
  })
})

// delete an existing note with the given object id
app.post('/api/budget/delete/:id', (req, res) => {
  BudgetCategory.findByIdAndRemove(req.params.id, (err) => {
    if (err) return res.status(404).send({message: err.message})
    return res.send({ message: 'budget category deleted!' })
  })
})

const PORT = 4000
app.listen(PORT)
console.log('api runnging on port ' + PORT + ': ')
