import React from "react";
import { Link } from "react-router";
import { hashHistory } from 'react-router';
export default class Products extends React.Component {
  handleClick() {
    const path = '/products/Ice%20cream';
    hashHistory.push(path);
  }
  render() {
    console.log(hashHistory);
    return (
      <div>
        <h1>Product List</h1>
        {this.props.children || <div>My Detail page</div> }
        <a onClick={() => this.handleClick()}>VIEW DETAIL</a>
      </div>
    );
  }
}
