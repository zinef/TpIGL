import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Select from '../Select';
export default class AfficherNote extends Component {
    constructor(){
        super();
        this.state={
           
            data : [],
            niveau: '',
            group:'',

        }
        this.handleDatachild=this.handleDatachild.bind(this);

    }
 
    handleDatachild(obj) {
        this.setState({data: obj.data,
            niveau:obj.niveau,
            group:obj.group,
            
        });
        console.log(this.state);
        
    
  
      }


    render() {
        return (
            
            <div className="container " style={{background : 'rgba(60,60,60,0.8)',
                                    color:"white"}}>
                <br/>
                <br/>
                <Select handlerFromParant={this.handleDatachild} /> 
                
                <table class="table">
                <thead className="text-white">
                    <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">CC</th>
                    <th scope="col">CI</th>
                    <th scope="col">CF</th>
                    <th scope="col">Moyenne</th>

                   
                    </tr>
                </thead>
                <tbody className='text-white'>
                {
                        this.state.data.map(data=>{
                            return(
                                <tr>
                                <th scope="row">{data.matricule}</th>
                                
                                <td>{data.nom}</td>
                                <td>{data.prenom}</td>
                                <td>{data.ci}</td>
                                <td>{data.cc}</td>
                                <td>{data.cf}</td>
                                <td>{data.moyenne}</td>
                                
                               
                            
                                
                                </tr>
                                
                            );
                        })} 
  
                                       {/* <tr>
                    <th scope="row">1</th>
                    
                    <td>hamla </td>
                    <td>hichem</td>
                    
                    
                    <td> 15 </td>
                    <td> 15 </td>
                    <td> 15 </td>
                    <td> 15 </td>
                    
                    
                    
                    </tr>
                     */}
                    
                    
                </tbody>
                </table>
              
            </div>
          
        );
    }
    
}

if (document.getElementById('afficherNote')) {
    ReactDOM.render(<AfficherNote/>, document.getElementById('afficherNote'));
}
