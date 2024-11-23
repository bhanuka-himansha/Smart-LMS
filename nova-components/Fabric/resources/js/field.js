import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-fabric', IndexField)
  app.component('detail-fabric', DetailField)
  app.component('form-fabric', FormField)
})
