export const select = <T extends HTMLElement>(id: string) =>
  document.querySelector(id) as T | null
