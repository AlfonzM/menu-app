import React from "react";

import Image from "./Image.js"

export default class SearchResult extends React.Component {
  render() {
    return (
      <div key={this.props.index} class="rslt-elem">
        <Image image={this.props.image}/>
        <div class="info-container">
          <span class="item-name">{this.props.name}</span>
          <span class="item-info">{this.props.category}
                                  {this.props.subcategory}
                                  &nbsp;
                                  <span class="sale-tag">
                                    {this.props.discount}
                                  </span>
          </span>
        </div>
      </div>
    );
  }
}
