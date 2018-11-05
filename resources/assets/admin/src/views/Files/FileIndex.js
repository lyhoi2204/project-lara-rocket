import React from "react";

import FileRepository from "../../repositories/FileRepository";
import columns from './_columns'
import info from './_info'
import {withRouter} from 'react-router-dom'
import Index from "../CRUDBase/Index";

class FileIndex extends Index {

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

}

export default withRouter(FileIndex);
