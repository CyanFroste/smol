import axios from 'axios'
import { select } from './utils'

const versionEl = select('.version')
const linksContainerEl = select('.links')

axios.get('/api/example').then(({ data }) => {
  versionEl!.textContent = `Version ${data.version}`

  linksContainerEl!.innerHTML = `Powered by
    <a class="text-sky-500" href=${data.links.tailwind}>Tailwind</a> &
    <a class="text-sky-500" href=${data.links.typescript}>Typescript</a>
  `
})
