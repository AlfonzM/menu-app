import React from "react";
import { Link } from "react-router";

export default class Header extends React.Component {
  handleFocus() {
    console.log("Add Collapse");
  }
  handleFocusOut() {
    console.log("Remove Collapse");
  }
  handleChange() {
    console.log("changing");
  }
  render() {
    return (
      <div class="input-wrap search-wrap collapse" onBlur={this.handleFocusOut.bind()} onFocus={this.handleFocus.bind()}>
        <input id="search" class="search-field" placeholder="Search Product..." type="text" onChange={this.handleChange.bind()}></input>
        <label for="search" class="btn-icn mdi mdi-magnify"></label>
        <div class="rslt-view">
          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">ソファー</span>
              <span class="item-info">家具 / 家の装飾 &nbsp;<span class="sale-tag">-70%</span></span>
            </div>
          </div>

          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">Round Table &nbsp;<i class="mdi mdi-bookmark feat-icon"></i></span>
              <span class="item-info">Furniture / Table &nbsp;<span class="sale-tag"></span></span>
            </div>
          </div>

          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">中国テーブル</span>
              <span class="item-info">家具 / 家の装飾 &nbsp;<span class="sale-tag">-70%</span></span>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
