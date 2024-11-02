import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-canvasField', IndexField)
  app.component('detail-canvasField', DetailField)
  app.component('form-canvasField', FormField)
})
