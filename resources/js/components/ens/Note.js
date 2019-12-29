import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Select from '../Select';
import  './ens.css';


export default class Note extends Component {
    constructor(){
        super();
        this.state={
            data : [],
            niveau: '',
            group:'',

        }
     
        this.handleDatachild=this.handleDatachild.bind(this);
        // this.chargerliste=this.chargerlist.bind(this);
    }
 // charger list de grop
    chargerliste( ){ 
        
        console.log('charger liste de ');
        console.log(this.state.niveau, );
        axios.get('http://127.0.0.1:8000/Enseignant/Note',{
            params:{
                niveau: this.state.niveau,
                group: this.state.group
            }
        })
        .then(response=>{
            this.setState({data:response.data});
        });

    }
    getvalue(){
        this.setState({niveau:document.getElementById("niveau").value});
        console.log(this.state.niveau); 

    }
    recuperernote(){
        let inputs, index;
        let tab=[];
        inputs = document.getElementsByClassName('envoyerNote');
        for (index = 1; index < inputs.length; ++index) {
            
                //tab.push({ id :inputs[index].id ,note :inputs[index].value});
                
            var obj={
                exam: document.getElementById('exam').value,
                niveau:this.state.niveau,
                group :this.state.group,
                note: inputs[index].value,
                id : inputs[index].id,
                module:this.state.module
            }
                axios.post('/envoyerNote',obj)
                .then(response=>{
                    
                });
        }
        
    }
    envoyernote(){
        this.recuperernote();
        
        
    }

    
    handleDatachild(obj) {
        this.setState({data: obj.data,
            niveau:obj.niveau,
            group:obj.group,
            module:obj.module
            
        });
        
    
  
      }

      
    
    render() {
        return (
            
            <div className="container" style={{background : 'rgba(60,60,60,0.8)',
            color:"white"}}>
            <br/>
            <br/>
               
               <Select handlerFromParant={this.handleDatachild} /> 
                <table class="table">
                <thead className='text-white'>
                    <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">
                        <select  id='exam' style={{padding :'0px'}} className='btn btn-secondary dropdown-toggle btn-sm borderAng select mdfont btn-sm'
                        >
                            <option value="cc">CC</option>
                            <option value="ci">CI</option>
                            <option value="cf">CF</option>
                            </select>
         
                    </th>
        
                   
                    </tr>
                </thead>
                <tbody className='text-white'>
                    {
                        this.state.data.map(data=>{
                            return(
                                <tr>
                                <th scope="row" key={data.id}>{data.id}</th>
                                
                                <td>{data.nom}</td>
                                <td>{data.prenom}</td>
                                <td>
                                    <div class="input-group input-group-sm  "  style={{width:'2cm'}}>
                                    <input type="text"  className="form-control form-control-sm envoyerNote"  id ={data.id} />
                                        <div className="input-group-append">
                                            
                                            <span  className="input-group-text form-control-sm" >/20</span>
                                        </div>
                                    </div>
                                </td>
                                
                               
                            
                                
    
                                </tr>
                                
                            );
                        })} 

                        
                      
       


                    

                   
                
        
                </tbody>

                </table>
                <input type="submit"  onClick={
                     
                    this.envoyernote.bind(this)} id ='submitSelect' 
                value="Sauvegarder les notes" style={{ margin : '4px'}} className="btn btn-outline-primary btn-sm borderAng"/>

               
            </div>
          
        );
    }
    
}

if (document.getElementById('note')) {
    ReactDOM.render(<Note/>, document.getElementById('note'));
}
