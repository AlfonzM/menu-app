import React from "react";
import { Link } from "react-router";

export default class ProductDetail extends React.Component {
  render() {
    console.log(this.props);
    return (
      <div>
        <h1>{this.props.params.item}</h1>
      </div>
    );
  }
}
