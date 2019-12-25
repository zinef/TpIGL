import React, { Component } from "react";
import axios from "axios";

export default class D extends Component {
  constructor(props) {
    super(props);

    this.state = {
      email: "",
      password: "",
       
    };

    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event) {
    this.setState({
      [event.target.name]: event.target.value
    });
  }

  handleSubmit(event) {
    const { email, password } = this.state;
    console.log("here I am");
    console.log({
      
        email: email,
        password: password
      
    });

    axios.post(
        "/a",
      
          {
            email: email,
            password: password
          }
        
      )
      .then(response => {
        
        // reste a affichage des erreur de auth
       
      
      })
      .catch(error => {
        console.log("login error", error);
      });
    event.preventDefault();
  }

  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
        <div className="form-group">
          <label >Email address</label>
          <input
            type="email"
            name="email"
            for="email"
            className="form-control"  
            aria-describedby="emailHelp" 
            placeholder="Enter email"
            value={this.state.email}
            onChange={this.handleChange}
            required
            />
          </div>
          <div className="form-group">
            <label >Password</label>
            <input
              type="password"
              name="password"
              for="password"
              placeholder="Password"
              className="form-control"
              value={this.state.password}
              onChange={this.handleChange}
              required
            />
          </div>
          <div className="form-group form-check">
                <input type="checkbox" className="form-check-input" id="exampleCheck1"/>
                <label className="form-check-label" >Check me out</label>
          </div>


          <button type="submit">Login</button>
        </form>
      </div>
    );
  }
}
if (document.getElementById('f')) {
    ReactDOM.render(<D/>, document.getElementById('f'));
}
