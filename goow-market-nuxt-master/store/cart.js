export const state = () => ({
  order: {
    products: [],
    amount: 0,
    market: [],
    merchantTime: [],
    marketTime: [],
  },
  scheduled: {
    date: '',
    time: '',
  },
})

export const getters = {
  order(state) {
    return state.order
  },
  hasOrder(state) {
    return !!state.order.amount
  },
  hasProduct: (state) => (id) => {
    return state.order.products.find((item) => item.product.id === id)
  },
  product: (state) => (id) => {
    return state.order.products.find((item) => item.product.id === id)
  },
  productByMerchants(state) {
    const arr = []
    state.order.products.forEach((item) => {
      const index = arr.findIndex((a) => a.merchant.id === item.merchant.id)
      if (index === -1) {
        arr.push({ merchant: item.merchant })
        arr[arr.length - 1].products = [
          {
            product: item.product,
            quantity: item.quantity,
          },
        ]
      } else
        arr[index].products.push({
          product: item.product,
          quantity: item.quantity,
        })
    })

    return arr
  },
  scheduled(state) {
    return state.scheduled
  },
}

export const mutations = {
  ADD_PRODUCT(state, item) {
    state.order.market = item.market
    state.order.marketTime = item.marketTime
    state.order.merchantTime = item.merchantTime
    const index = state.order.products.findIndex(
      (product) => product.product.id === item.product.id
    )

    if (index > -1) state.order.products[index].quantity += item.quantity
    else
      state.order.products.push({
        product: item.product,
        quantity: item.quantity,
        merchant: item.merchant,
      })

    state.order.amount += item.product.price * item.quantity
  },
  INCREASE(state, item) {
    const index = state.order.products.findIndex(
      (product) => product.product.id === item.product.id
    )

    ++state.order.products[index].quantity
    state.order.amount += Number(item.product.price)
  },
  DECREASE(state, item) {
    const index = state.order.products.findIndex(
      (product) => product.product.id === item.product.id
    )

    if (state.order.products[index].quantity < 2) return

    --state.order.products[index].quantity
    state.order.amount -= Number(item.product.price)
  },
  REMOVE(state, item) {
    const index = state.order.products.findIndex(
      (product) => product.product.id === item.product.id
    )
    const amount = item.product.price * item.quantity
    state.order.amount -= Number(amount)
    state.order.products.splice(index, 1)
    state.order.market = null
  },
  REMOVEPRODUCT(state, item) {
    const index = state.order.products.findIndex(
      (product) => product.product.id === item.product.id
    )
    const amount = item.product.price * item.quantity
    state.order.amount -= Number(amount)
    state.order.products.splice(index, 1)
  },
  CLEAR(state) {
    state.order.products = []
    state.order.amount = 0
    state.scheduled.date = ''
    state.scheduled.time = ''
  },
  SET_SCHEDULED_DATE(state, item) {
    state.scheduled.date = item
  },
  SET_SCHEDULED_TIME(state, item) {
    state.scheduled.time = item
  },
}
