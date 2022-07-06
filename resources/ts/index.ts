import axios from 'axios'
import { version } from './utils'

const versionEl = document.querySelector('.version') as HTMLSpanElement
const descriptionEl = document.querySelector(
  '.description'
) as HTMLParagraphElement
const linksContainerEl = document.querySelector('.links') as HTMLDivElement

versionEl.textContent = `Version ${version()}`

axios.get('/api/example').then(({ data }) => {
  descriptionEl.textContent = data.description

  linksContainerEl.innerHTML = `Powered by
    <a class="text-sky-500" href=${data.links.tailwind}>Tailwind</a> &
    <a class="text-sky-500" href=${data.links.typescript}>Typescript</a>
  `
})
