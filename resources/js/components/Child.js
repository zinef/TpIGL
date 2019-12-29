import React, { Component } from 'react';
import ReactDOM from 'react-dom';
export default class Child extends React.Component{
     
  
    render() {
         
    
    return(
        <div >
            <div>-data-fils---</div>
            <div>{this.props.data.state}</div>
            <button onClick={()=>{this.props.data.changeUnit('this.state')}}> buttonvchild</button>
        </div>
    );
        
    }
};
if (document.getElementById('0')) {
    ReactDOM.render(  <Child/>,document.getElementById('0') );
} 
