
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Child from './Child';
export default class Pere extends React.Component {
    

    
    constructor(){
        super();
    //   this.setState({
    //       unit:'kg'
    //   });
      this.state = {unit:'kg'};
      console.log(this.state);
    }
    changeUnit(item){
    
        this.setState(item);
    }
    render() {
        return (
            <div>
                <p>--pere--</p>
                <Child data={{
                    state : this.state,
                    changeUnit:this.changeUnit.bind(this)
                }}/>
            </div>
        );
    }
}
if (document.getElementById('0')) {
    ReactDOM.render(  <Pere/>,document.getElementById('0') );
} 
