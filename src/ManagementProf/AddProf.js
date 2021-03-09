import React, { useState } from "react";
import { Modal, ModalHeader, ModalBody } from "reactstrap";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import FormAdd from './FormAdd'
const AddProf = (props) => {
  const { className } = props;

  const [modal, setModal] = useState(false);
  const [unmountOnClose] = useState(true);

  const toggle = () => setModal(!modal);
 

  return (
    <div>
      {/* <Button color="primary"  size="sm">
      Add Subject
      </Button> */}
      <FontAwesomeIcon
               onClick={toggle}
                icon={['fa', 'plus']}
                className="font-size-lg"
              />
      <Modal
        centered={true}
        size="xl"
        heigth="500px"
        isOpen={modal}
        toggle={toggle}
        className={className}
        unmountOnClose={unmountOnClose}
      >
        <ModalHeader toggle={toggle}>Add AddProf</ModalHeader>
        <ModalBody>

            <FormAdd />
        </ModalBody>
      </Modal>
    </div>
  );
};

export default AddProf;
