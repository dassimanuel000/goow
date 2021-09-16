class Errors {
  constructor() {
    this.errors = {}
  }

  has(field) {
    return Object.prototype.hasOwnProperty.call(this.errors, field)
  }

  any() {
    return false
  }

  get(field) {
    if (this.errors[field]) {
      return this.errors[field][0]
    }
  }

  record(errors) {
    this.errors = errors
  }

  clear(field) {
    if (field) {
      delete this.errors[field]

      return
    }

    this.errors = {}
  }

  empty() {
    this.errors = {}
  }
}

export default Errors
