import React from "react";

import Header from "../components/Header.js";

export default class DropOption extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      count: this.props.count
    };
  }
  render() {
    return (
      <div class="option"
           onClick={this.props.onClick}>
        <span>{this.props.name}</span>
        <span class="count">{this.state.count}</span>
      </div>
    );
  }
}
