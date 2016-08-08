import React from "react";
import { Link } from "react-router";
import API from "../API.js";

export default class ProductDetail extends React.Component {
  constructor(props){
    super(props)
    this.state = {
      product: {}
    }
  }
  componentDidMount(){
    this.updateProductInfo(this.props.params.item)
  }
  componentWillReceiveProps(nextProps) {
    this.updateProductInfo(nextProps.params.item)
  }
  updateProductInfo(productId) {
    API.getProduct(productId, function(data){
      this.setState({product: data})
    }.bind(this))
  }
  render() {
    if(this.state.product.id){
      return (
        <div>
        <img src={this.state.product.images[0] && this.state.product.images[0].filename} style={{ maxHeight: '200px' }}/>
        <h1>{this.state.product.name.en}</h1>
        <h2>{this.state.product.category.name.en} / {this.state.product.subcategory.name.en}</h2>
        <h3>{this.state.product.pepper_description.en}</h3>
        </div>
        );
    }

    return (
      <div>
      <h1>Loading...</h1>
      </div>
      );
  }
}
