import React from 'react';
import { Row, Col, Card, InputGroup, FormControl, Button } from 'react-bootstrap';
import { Formik } from 'formik';
import * as Yup from 'yup';
import axios from 'axios';

const SignupSchema = Yup.object().shape({



});


class FormAdd extends React.Component {

    state = {
        Subjects: [],
    };

    componentDidMount() {


    }
    handlSubmit = values => {
        console.log(values)
          axios.post('http://localhost:8000/subjects/add',values).then((Response)=>{

            console.log(Response.data)
          })

    }
    showForm = ({
        values,
        errors,
        touched,
        handleChange,
        handleSubmit,
        handleBlur,
        setFieldValue,
        isSubmitting,
        dirty,
        isValid,
        handleReset
    }) => {
        return (
            <Row>
                <Col>

                    <Card>
                        <Card.Header>
                            <Card.Title as="h5">Create New Subject</Card.Title>
                        </Card.Header>
                        <Card.Body>
                            <Row>
                                <Col md={12}>
                                    <label htmlFor="basic-url">Subject Name</label>

                                    <InputGroup className="mb-3">

                                        <FormControl
                                            placeholder="Subject"
                                            aria-label="Subject"
                                            aria-describedby="Subject"
                                            onChange={handleChange}
                                            onBlur={handleBlur}
                                            value={values.Subject}
                                            isInvalid={!values.Subject}
                                            label="Subject"
                                            name="Subject"

                                        />
                                    </InputGroup>





                                </Col>
                                <Col md={6}>



                                    <label htmlFor="basic-url">coefficient</label>

                                    <InputGroup className="mb-3">

                                        <FormControl
                                            placeholder="coefficient"
                                            aria-label="coefficient"
                                            aria-describedby="coefficient"
                                            onChange={handleChange}
                                            onBlur={handleBlur}
                                            value={values.coefficient}
                                            isInvalid={!values.coefficient}
                                            label="coefficient"
                                            name="coefficient"

                                        />
                                    </InputGroup>

                                </Col>
                                <Col md={6}>



                                    <label htmlFor="basic-url">credit</label>

                                    <InputGroup className="mb-3">

                                        <FormControl
                                            placeholder="credit"
                                            aria-label="credit"
                                            aria-describedby="credit"
                                            onChange={handleChange}
                                            onBlur={handleBlur}
                                            value={values.credit}
                                            isInvalid={!values.credit}
                                            label="credit"
                                            name="credit"
                                            

                                        />
                                    </InputGroup>

                                </Col>


                            </Row>

                            <Button onClick={() => {
                                this.handlSubmit(values);
                                handleReset();
                            }}>
                                Save
                                </Button>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        );
    };

    render() {

        return (
            <Formik
                initialValues={{
                    Subject: '',
                    credit:0,
                    coefficient:0
                }}
                onSubmit={(values, { setSubmitting }) => {
                    this.submitForm(values);
                    setSubmitting(false);
                }}
                validationSchema={SignupSchema}>

                {props => this.showForm(props)}
            </Formik>)
    }




}

export default FormAdd;