import React from "react";
import API from "../API.js";
import $ from "jquery";
import jqueryform from "jquery-form";

export default class Categories extends React.Component {
  constructor(props){
  	super(props);
  	this.state = {
  		categories: []
  	}
  }
  componentDidMount(){
    this.fetchCategories()
  }
  submitForm(e){
    e.preventDefault();

    var $form = $(e.target);

    API.createCategory($form, (data) => {
      this.fetchCategories()
    })
  }
  fetchCategories(){
    API.getCategories(function(data){
      this.setState({categories: data});
    }.bind(this));
  }
  render() {
    return (
      <div>
        <h1>Categories</h1>

        {this.renderCategoriesList()}
        {this.renderCreateCategoryForm()}
      </div>
    );
  }



  // Temporary forms
  renderCreateCategoryForm(){
    return (
      <form id="myform" onSubmit={this.submitForm.bind(this)}>
        <p>Name EN: <input type="text" name="name-en" /></p>
        <p>Name JP: <input type="text" name="name-jp" /></p>
        <p>Name CN: <input type="text" name="name-cn" /></p>
        <input id="submit" type="submit" value="Submit" />
      </form>
    )
  }
  renderCategoriesList(){
    return(
      this.state.categories.map(function(category, i){
        return <div key={category.id}>{category.name.en} / {category.name.jp} / {category.name.cn}</div>
      })
    )
  }
}
