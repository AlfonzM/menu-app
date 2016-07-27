import React from "react";
import { Link, Router } from "react-router";

import Header from "../components/Header.js";

export default class Layout extends React.Component {
  render() {
    return (
      <div>
        <Header />
        {this.props.children}
      </div>
    );
  }
}
