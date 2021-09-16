export default function ({ store, redirect }) {
  if (!store.getters['cart/hasOrder']) return redirect('/')
}
