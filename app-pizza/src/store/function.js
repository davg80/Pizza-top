function setTotal(product) {
  let result = 0;
  let workForce = 0;
  for (const key in product.ingredients) {
    let productPrice = parseFloat(product.ingredients[key].price);
    result += productPrice;
  }
  workForce = result / 2;
  return (result + workForce).toFixed(2);
}
module.exports = setTotal;
