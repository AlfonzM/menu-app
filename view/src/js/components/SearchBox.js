import React from "react";
import { Link } from "react-router";

export default class Header extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isActive: 'input-wrap search-wrap',
      searchResult: ''
    };
  }
  handleFocus() {
    if(this.state.isActive != 'collapse input-wrap search-wrap') {
      this.setState({ isActive: 'collapse input-wrap search-wrap' });
    }
  }
  handleFocusOut() {
    this.setState({ isActive: 'input-wrap search-wrap' });
  }
  handleChange() {

  }
  render() {
    var collapse = this.state.isActive;
    var products = [
  {
    "id": 1,
    "category_id": 1,
    "subcategory_id": 3,
    "name": "Ice cream",
    "description": "Vanilla",
    "pepper_description": "Buy our Vanilla flavored ice cream its the best yey",
    "featured": 0,
    "ranking": 0,
    "category": {
      "id": 1,
      "name": "Food"
    },
    "subcategory": {
      "id": 3,
      "category_id": 1,
      "name": "Dessert"
    },
    "images": [
      {
        "id": 1,
        "product_id": 1,
        "filename": "icecream1.jpg"
      },
      {
        "id": 2,
        "product_id": 1,
        "filename": "icecream2.jpg"
      },
      {
        "id": 3,
        "product_id": 1,
        "filename": "icecream3.jpg"
      }
    ],
    "videos": []
  },
  {
    "id": 2,
    "category_id": 1,
    "subcategory_id": 1,
    "name": "Bacon and egg",
    "description": "Bacon and egg meal",
    "pepper_description": "With free unlimited coffee yey",
    "featured": 0,
    "ranking": 0,
    "category": {
      "id": 1,
      "name": "Food"
    },
    "subcategory": {
      "id": 1,
      "category_id": 1,
      "name": "Breakfast"
    },
    "images": [
      {
        "id": 4,
        "product_id": 2,
        "filename": "baconandeggs1.jpg"
      },
      {
        "id": 5,
        "product_id": 2,
        "filename": "baconandeggs2.jpg"
      }
    ],
    "videos": [
      {
        "id": 1,
        "product_id": 2,
        "filename": "baconeggvideo.mp4"
      }
    ]
  }
];

    var searchResultComponents = products.map(function(products, i) {
      return  <div key={i} class="rslt-elem">
                <img class="rslt-img"></img>
                <div class="info-container">
                  <span class="item-name">{products.name}</span>
                  <span class="item-info">{products.category.name} /{products.subcategory.name} &nbsp;<span class="sale-tag"></span></span>
                </div>
              </div>;
    });

      return <div className={this.state.isActive} onBlur={() => this.handleFocusOut()} onFocus={() => this.handleFocus()} tabIndex="0">
               <input type="search" id="search" class="search-field icon-contain" placeholder="Search Product..." onChange={() => this.handleChange()}></input>
               <label for="search" class="btn-icn mdi mdi-magnify"></label>
               <div class="rslt-view">{searchResultComponents}</div>
             </div>;
  }
}
