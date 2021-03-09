import React, { Fragment, Component } from 'react';

import { PageTitle } from '../layout-components';
import {

  IconButton,
  Box,
  Card,
  CardContent,
} from '@material-ui/core'
import axios from "axios"
import AddProf from './AddProf'
var urlbackend = require('../config/env')();
export default class ListSubject extends Component {
  constructor(props) {
    super(props);

    this.state = {
      teachers: [],
    };
  }

  componentDidMount() {
    axios.get(urlbackend + "/teachers/index").then((response) => {
      this.setState({ teachers: response.data.content })
      console.log(response.data)
    })

  }



  render() {
    return (
      <Fragment>
        <PageTitle
          titleHeading="Prof"
          titleDescription="Prof."
        />
        <Card className="card-box mb-4">
          <div className="card-header">
            <div className="card-header--title">
              <small>List Prof</small>
              {/* <b>This table card has custom content</b> */}
            </div>
            <Box className="card-header--actions">
              <IconButton
                size="small"
                color="primary"
                className="text-primary"
                title="View details">
                  <AddProf />
              </IconButton>
            </Box>
          </div>
          <CardContent className="p-0">
            <div className="table-responsive">
              <table className="table table-striped table-hover text-nowrap mb-0">
                <thead className="thead-light">
                  <tr>
                    <th style={{ width: '40%' }}>#</th>
                    <th className="text-center">Phone</th>
                    <th className="text-center">email</th>
                    <th className="text-center">Actions</th>

                  </tr>
                </thead>
                <tbody>
{           this.state.teachers.map((teacher,index)=>(

                  <tr key={index}>
                    <td >
                      <div  className="d-flex align-items-center">
                        <div>
                          <a
                            href="#/"
                            onClick={e => e.preventDefault()}
                            className="font-weight-bold text-black"
                            title="...">
                            {teacher.id}
                           </a>
                          <span className="text-black-50 d-block">
                          {teacher.first_name}-{teacher.last_name}
                           </span>
                        </div>
                      </div>
                    </td>
                    <td className="text-center"> 
                    <div className="h-auto  badge ">
                      {teacher.phone}

                   </div>
                    </td>
                    <td className="text-center"> 
                    <div className="h-auto  badge ">
                      {teacher.email}

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
