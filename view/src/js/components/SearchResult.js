import React from "react";

import Image from "./Image.js"

export default class SearchResult extends React.Component {
  render() {
    let target = this.props.target;
    let prod_name = this.props.name.toLowerCase();
    let startIndex = -1;
    let endIndex = -1;
    if(prod_name.indexOf(target) !== -1) {
      startIndex = prod_name.indexOf(target.toLowerCase());
      endIndex = startIndex+target.length;
    }
    return (
      <div key={this.props.index} class="rslt-elem">
        <Image image={this.props.image}/>
        <div class="info-container">
          <span class="item-name">{this.props.name.substring(0, startIndex)}
                                  <mark>{this.props.name.substring(startIndex, endIndex)}</mark>
                                  {this.props.name.substring(endIndex, this.props.name.length)}
                                  </span>
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
