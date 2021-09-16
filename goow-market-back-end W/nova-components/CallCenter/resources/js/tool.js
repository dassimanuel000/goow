Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'call-center',
      path: '/call-center',
      component: require('./components/Index'),
    },
  ])
})
