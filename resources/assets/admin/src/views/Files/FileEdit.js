import React from "react";

import FileRepository from "../../repositories/FileRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Edit from "../CRUDBase/Edit";

class FileEdit extends Edit {

  setPageInfo() {
    this.title = info.title;
    this.path = info.path;
  }

  setRepository() {
    this.repository = new FileRepository();
  }

  setColumnInfo() {
    this.columns = columns;
  }

  setRelationRepository() {
    this.relationRepositories = {
    };
  }
}

export default withRouter(FileEdit);
