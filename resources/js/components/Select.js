import React, { Component } from 'react';
import ReactDOM from 'react-dom';
export default class Select extends React.Component {
    constructor(props) {
      super(props);
      this.state = {niveau: '1CS',group:'G1',module:'SYC'
    };
  
      this.handleChange = this.handleChange.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
      this.passdata = this.passdata.bind(this);
    }
    passdata(evt) {
      evt.preventDefault();
     
     
      console.log('charger liste de select ');
      
      console.log(this.state );
      axios.get('/Enseignant/Note',{
          params:{
              niveau: this.state.niveau,
              group: this.state.group,
              module:this.state.module
          }
      })
      .then(response=>{
        
        this.props.handlerFromParant({ data : response.data, niveau:this.state.niveau ,group :this.state.group,
          module:this.state.module
        });
           
      });

      
     
    }
    
  
    handleChange(event) {
      this.setState({ [event.target.name]: event.target.value});
    }
  
    handleSubmit(event) {
    }
  
    render() {
      return (
        <form onSubmit={this.passdata}>
          <label>
            <span style={{ fontSize: '17px'}} > Vous Choisissez un groupe pour leurs affecter des notes : <span> </span> </span> 
            <select value={this.state.niveau} className='btn btn-secondary dropdown-toggle btn-sm borderAng select'
             name ='niveau' onChange={this.handleChange}>
              <option value="1CP">1CP</option>
              <option value="2CP">2CP</option>
              <option value="1CS">1CS</option>
              <option value="2CS">2CS</option>
              <option value="3CS">3CS</option>
            </select>
          </label>
          <label>
            
            <select value={this.state.group} className='btn btn-secondary dropdown-toggle btn-sm borderAng select'
             name ='group'onChange={this.handleChange}>
              <option value="1">G1</option>
              <option value="2">G2</option>
              <option value="3">G3</option>
              <option value="4">G4</option>
              <option value="5">G5</option>
              <option value="6">G6</option>
              <option value="7">G7</option>
              <option value="8">G8</option>
              <option value="9">G9</option>
            </select>
          </label>
          <label>
            <select value={this.state.module} className='btn btn-secondary dropdown-toggle btn-sm borderAng select' 
             name ='module'onChange={this.handleChange}>
              <option value="syc">SYC</option>
              <option value="ro">RO</option>
              <option value="igl">IGL</option>
            </select>
          </label>
          <input dusk="submit-button" type="submit" id ='submitSelect' value="Submit" style={{ margin : '4px'}} className="btn btn-outline-primary btn-sm borderAng"/>
        </form>
      );
    }
  }

  
  if (document.getElementById('select')) {
    ReactDOM.render(  <Select/>,document.getElementById('select') );
} 