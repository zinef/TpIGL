import React, { Component } from 'react';
import ReactDOM from 'react-dom';
export default class Select extends React.Component {
    constructor(props) {
      super(props);
      this.state = {niveau: '1CS',group:'G1'
    };
  
      this.handleChange = this.handleChange.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
      this.passdata = this.passdata.bind(this);
    }
    passdata(evt) {
      evt.preventDefault();
     
     
      console.log('charger liste de select ');
      console.log(this.state.niveau );
      console.log(this.state.group );
      axios.get('http://127.0.0.1:8000/Enseignant/Note',{
          params:{
              niveau: this.state.niveau,
              group: this.state.group
          }
      })
      .then(response=>{
        
        this.props.handlerFromParant({ data : response.data, niveau:this.state.niveau ,group :this.state.group});
           
      });

      
     
    }
    
  
    handleChange(event) {
      this.setState({ [event.target.name]: event.target.value});
    }
  
    handleSubmit(event) {
      alert('niveau: ' + this.state.niveau+' group : '+ this.state.group);
      axios.post(
        "/liste",
        {
         // params: {
            group: this.state.group,
            niveau: this.state.niveau
         // }
        }
      )
      .then(response => {
        console.log(response.data);
        
      })
      .catch(error => {
        console.log("login error", error);
      });
      event.preventDefault();

      
    }
  
    render() {
      return (
        <form onSubmit={this.passdata}>
          <label>
            <span style={{ fontSize: '17px'}} >Choisi un groupe pour les affecter des note : <span> </span> </span> 
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
            
            <select value={this.state.group} className='btn btn-secondary dropdown-toggle btn-sm borderAng select' name ='group'onChange={this.handleChange}>
              <option value="G1">G1</option>
              <option value="G2">G2</option>
              <option value="G3">G3</option>
              
            </select>
          </label>
          <input type="submit" id ='submitSelect' value="Submit" style={{ margin : '4px'}} className="btn btn-outline-primary btn-sm borderAng"/>
        </form>
      );
    }
  }

  
  if (document.getElementById('select')) {
    ReactDOM.render(  <Select/>,document.getElementById('select') );
} 