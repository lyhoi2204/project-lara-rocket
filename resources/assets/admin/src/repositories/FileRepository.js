import BaseRepository from "./BaseRepository";

class FileRepository extends BaseRepository {
  constructor(){
    super();
    this.PATH = "/files";
  }
}

export default FileRepository;
