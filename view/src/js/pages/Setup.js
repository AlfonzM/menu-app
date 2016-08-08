import React from "react";
import { Link } from "react-router";
import API from "../API.js";
import $ from "jquery";
import jqueryform from "jquery-form";

export default class Setup extends React.Component {
  constructor(props){
    super(props)
    this.state = {
      setting : {}
    }

    this.handleChange = this.handleChange.bind(this)
    this.handleLanguagesChange = this.handleLanguagesChange.bind(this)
    this.submitForm = this.submitForm.bind(this)
  }
  componentDidMount() {
    API.getSetting(1, function(data){
      console.log(data)
      this.setState({setting: data})
    }.bind(this))
  }
  submitForm(e){
    e.preventDefault();
    API.editSetting($(e.target), function(data){
      console.log("TO SAVE")
      console.log(this.state.setting)

      console.log("RESULT")
      console.log(data)
      // this.setState({setting: data}, console.log(this.state.setting))
    }.bind(this));
  }
  handleChange(e){
    var fieldName = e.target.name.replace("-", "_")                     // field's name attr
    var newValue = e.target.value                     // new value of the input
    var language = e.target.dataset.language || null  // if the field is multi-lang or not

    var state = this.state

    console.log(fieldName + " = " + newValue)

    if(language){
      state['setting'][e.target.dataset.field][language] = newValue
    } else {
      state['setting'][fieldName] = newValue
    }

    this.setState(state, console.log(this.state.setting))
  }
  handleLanguagesChange(e) {
    var languages = []
    var value = e.target.value

    if(this.state.setting.languages != ""){
      languages = this.state.setting.languages.split(',')
    }

    var indexOf = languages.indexOf(value)
    console.log(indexOf)

    if(indexOf != -1){
      languages.splice(indexOf,1);
    } else{
      languages.push(value)
    }

    var state = this.state;
    state['setting']['languages'] = languages.toString()

    this.setState(state, console.log(this.state.setting))
  }
  render() {
    return (
      <div>
        {this.renderSetupForm()}
      </div>
    );
  }


  // Temporary form
  renderSetupForm(){
    return (
      <div>
        <h1>Setup</h1>
        <form id="myform" onSubmit={this.submitForm}>
          <input name="_method" type="hidden" value="PUT" />
          <p>logo <input type="file" name="logo"/></p>
          <p>name <input onChange={this.handleChange} type="text" name="name" value={this.state.setting.name} /></p>
          <p>greeting-en <input onChange={this.handleChange} type="text" data-field="greeting" name="greeting-en" data-language="en" value={this.state.setting.greeting && this.state.setting.greeting.en || ""} /></p>
          <p>greeting-jp <input onChange={this.handleChange} type="text" data-field="greeting" name="greeting-jp" data-language="jp" value={this.state.setting.greeting && this.state.setting.greeting.jp || ""} /></p>
          <p>greeting-cn <input onChange={this.handleChange} type="text" data-field="greeting" name="greeting-cn" data-language="cn" value={this.state.setting.greeting && this.state.setting.greeting.cn || ""} /></p>
          <div>
            <label>default-language</label>
            <p>
              <input type="radio" onChange={this.handleChange} checked={this.state.setting.default_language === 'en'} name="default-language" value="en" id="default-language-en" /><label for="default-language-en">English</label><br/>
              <input type="radio" onChange={this.handleChange} checked={this.state.setting.default_language === 'jp'} name="default-language" value="jp" id="default-language-jp" /><label for="default-language-jp">Japanese</label><br/>
              <input type="radio" onChange={this.handleChange} checked={this.state.setting.default_language === 'cn'} name="default-language" value="cn" id="default-language-cn" /><label for="default-language-cn">Chinese</label><br/>
            </p>
          </div>
          <div>
            <label>languages:</label>
            <p>
              <input type="checkbox" onChange={this.handleLanguagesChange} checked={this.state.setting.languages && this.state.setting.languages.includes('en')} name="language-en" id="language-en" value="en" /><label for="language-en">English</label><br/>
              <input type="checkbox" onChange={this.handleLanguagesChange} checked={this.state.setting.languages && this.state.setting.languages.includes('jp')} name="language-jp" id="language-jp" value="jp" /><label for="language-jp">Japanese</label><br/>
              <input type="checkbox" onChange={this.handleLanguagesChange} checked={this.state.setting.languages && this.state.setting.languages.includes('cn')} name="language-cn" id="language-cn" value="cn" /><label for="language-cn">Chinese</label><br/>
            </p>
          </div>
          <p>wait-mode <input onChange={this.handleChange} type="text" name="wait-mode" value={this.state.setting.wait_mode} /></p>
          <p>wait-interval <input onChange={this.handleChange} type="text" name="wait-interval" value={this.state.setting.wait_interval} /></p>
          <p>slideshow images <input type="file" name="images[]" multiple /></p>
          <input id="submit" type="submit" value="Submit" />
        </form>
      </div>
    );
  }
}
