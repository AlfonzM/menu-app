import React from "react";

export default class Header extends React.Component {
  handleChange() {
    console.log("changing");
  }
  render() {
    return (
      <div class="input-wrap search-wrap collapse">
        <input id="search" class="search-field" placeholder="Search Product..." type="text" onChange={this.handleChange.bind()}></input>
        <label for="search" class="btn-icn mdi mdi-magnify"></label>
        <div class="rslt-view">
          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">ソファー</span>
              <span class="item-info">家具 / 家の装飾 &nbsp;<span class="sale-tag">SALE!</span></span>
            </div>
          </div>
          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">Lamp</span>
              <span class="item-info">Appliance / Light &nbsp;<span class="sale-tag">SALE!</span></span>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
