import React, { Fragment, Component } from 'react';

import { PageTitle } from '../layout-components';
import {

  IconButton,
  Box,
  Card,
  CardContent,
} from '@material-ui/core'
import AddSubject from './AddSubject'
import axios from "axios"
var urlbackend = require('../config/env')();
export default class ListSubject extends Component {
  constructor(props) {
    super(props);

    this.state = {
      Subjects: [],
    };
  }

  componentDidMount() {
    axios.get(urlbackend + "/subjects/index").then((response) => {
      this.setState({ Subjects: response.data.content })
      console.log(response.data)
    })

  }



  render() {
    return (
      <Fragment>
        <PageTitle
          titleHeading="ListSubject"
          titleDescription="ListSubject."
        />
        <Card className="card-box mb-4">
          <div className="card-header">
            <div className="card-header--title">
              <small>List Subject</small>
              {/* <b>This table card has custom content</b> */}
            </div>
            <Box className="card-header--actions">
              <IconButton
                size="small"
                color="primary"
                className="text-primary"
                title="View details">

                <AddSubject />
              </IconButton>
            </Box>
          </div>
          <CardContent className="p-0">
            <div className="table-responsive">
              <table className="table table-striped table-hover text-nowrap mb-0">
                <thead className="thead-light">
                  <tr>
                    <th style={{ width: '40%' }}>#</th>
                    <th className="text-center">credit</th>
                    <th className="text-center">coefficient</th>
                    <th className="text-center">Actions</th>

                  </tr>
                </thead>
                <tbody>
{           this.state.Subjects.map((Subject,index)=>(

                  <tr key={index}>
                    <td >
                      <div  className="d-flex align-items-center">
                        <div>
                          <a
                            href="#/"
                            onClick={e => e.preventDefault()}
                            className="font-weight-bold text-black"
                            title="...">
                            {Subject.id}
                           </a>
                          <span className="text-black-50 d-block">
                          {Subject.description}
                           </span>
                        </div>
                      </div>
                    </td>
                    <td className="text-center"> 
                    <div className="h-auto  badge ">
                      {Subject.credit}

                   </div>
                    </td>
                    <td className="text-center"> 
                    <div className="h-auto  badge ">
                      {Subject.coefficient}

                   </div>
                    </td>
                    <td className="text-center">
                      <div className="h-auto py-0 px-3 badge badge-danger">
                      delete

                   </div>
                   <div className="h-auto py-0 px-3 badge badge-info">
                      update

                   </div>
                    </td>
                    <td className="text-center">
                      <Box>
                        <IconButton color="primary" size="small">
                          {/* <FontAwesomeIcon icon={['fas', 'ellipsis-h']} /> */}
                        </IconButton>
                      </Box>
                    </td>

                  </tr>

))}

                </tbody>
              </table>
            </div>
          </CardContent>
        </Card>

      </Fragment>
    );
  }
}
