import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
  state: () => ({ cart: [], }),
  actions: {
    removeProductFromCart (prodId) {
        this.cart.forEach((product, index) => {
            if (product.id === prodId) this.cart.splice(index, 1)
        })
    }
  },
  persist: true
})
