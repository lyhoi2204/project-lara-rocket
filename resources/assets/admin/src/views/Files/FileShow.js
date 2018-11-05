import React from "react";

import FileRepository from "../../repositories/FileRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Show from "../CRUDBase/Show";

class FileShow extends Show {

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

export default withRouter(FileShow);
