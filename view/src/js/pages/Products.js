import React from "react";
import { Link } from "react-router";
import { hashHistory } from 'react-router';
import API from "../API.js";
import $ from "jquery";

export default class Products extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      products: []
    }
  }
  componentDidMount(){
    API.getProducts(null, function(data){
      this.setState({products: data})
    }.bind(this));
  }
  openProduct(id) {
    const path = '/products/' + id;
    hashHistory.push(path);
  }
  submitForm(e){
    e.preventDefault();

    var $form = $(e.target);

    API.createProduct($form, (data) => {
      console.log('Product created')
      console.log(data)
    })
  }
  render() {
    return (
      <div>
        <h1>Products</h1>
        {this.renderProductsList()}
        {this.props.children || <div>My Detail page</div> }
        {this.renderCreateProductForm()}
      </div>
    );
  }



  // Temporary functions
  renderProductsList(){
    return (
      <div>
        {this.state.products.map(function(product, i){
          return this.renderProduct(product)
        }.bind(this))}
      </div>
    )
  }
  renderProduct(product){
    return (
      <p key={product.id}>
        <a href="#" onClick={(e) => {e.preventDefault(); this.openProduct(product.id) }}>
          {product.name.en}
        </a>
      </p>
    )
  }
  renderCreateProductForm(){
    return (
      <div>
        <h3>Create Product</h3>
        <form id="myform" onSubmit={this.submitForm.bind(this)}>
          <p>Category ID <input type="number" name="category-id"/></p>
          <p>Subcategory ID <input type="number" name="subcategory-id"/></p>

          <p>Name EN: <input type="text" name="name-en" /></p>
          <p>Name JP: <input type="text" name="name-jp" /></p>
          <p>Name CN: <input type="text" name="name-cn" /></p>

          <p>Description EN: <input type="text" name="description-en" /></p>
          <p>Description JP: <input type="text" name="description-jp" /></p>
          <p>Description CN: <input type="text" name="description-cn" /></p>

          <p>Pepper Description EN: <input type="text" name="pepper-description-en" /></p>
          <p>Pepper Description JP: <input type="text" name="pepper-description-jp" /></p>
          <p>Pepper Description CN: <input type="text" name="pepper-description-cn" /></p>

          <p>images <input type="file" name="images[]" multiple /></p>
          <p>videos <input type="file" name="videos[]" multiple /></p>

          <p>featured <input type="checkbox" name="featured" /></p>
          <p>discount <input type="number" name="discount" /></p>
          <p>ranking <input type="number" name="ranking" /></p>

          <input id="submit" type="submit" value="Submit" />
        </form>
      </div>
    )
  }
}
