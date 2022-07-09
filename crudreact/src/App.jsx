import { useState, useEffect } from 'react';
import './bootstrap.css';
import './App.css';
import axios from 'axios';
import DataContext from './Coponents/DataContext';
import Create from './Coponents/Create';
import List from './Coponents/List';
import Add from './Coponents/Add';
import Remove from './Coponents/Remove';

function App() {
  const [account, setAccount] = useState([]);
  const [lastUpdate, setLastUpdate] = useState(Date.now());

  const [modalCreate, setModalCreate] = useState(null);
  const [createAccount, setCreateAccount] = useState(null);
  const [deleteAccount, setDeleteAccount] = useState(null);

  const [modalAccount, setModalAccount] = useState(null);
  const [addToAccount, setAddToAccount] = useState(null);

  const [modalAccountRem, setModalAccountRem] = useState(null);
  const [remToAccount, setRemToAccount] = useState(null);

  const [message, setMessage] = useState(null);
  const [messageCreate, setMessageCreate] = useState(null);
  const [styleCreate, setStyleCreate] = useState(null);
  const [styleCreateList, setStyleCreateList] = useState(null);

  useEffect(() => {
    axios
      .get('http://testcrudreact.lt/listJson')
      .then((res) => setAccount(res.data));
  }, [lastUpdate]);

  useEffect(() => {
    if (null === createAccount) return;
    axios
      .post('http://testcrudreact.lt/listJson', createAccount)
      .then((res) => {
        setMessageCreate(res.data.msg);
        setStyleCreate(res.data.style);
        setLastUpdate(Date.now());
      });
  }, [createAccount]);

  useEffect(() => {
    if (null === deleteAccount) return;
    axios
      .delete('http://testcrudreact.lt/listJson/' + deleteAccount.client)
      .then((res) => {
        setMessage(res.data.msg);
        setStyleCreateList(res.data.style);
        setLastUpdate(Date.now());
      });
  }, [deleteAccount]);

  useEffect(() => {
    if (null === addToAccount) return;
    axios
      .put('http://testcrudreact.lt/listJson/' + addToAccount.id, addToAccount)
      .then((res) => {
        setMessage(res.data.msg);
        setStyleCreateList(res.data.style);
        setLastUpdate(Date.now());
      });
  }, [addToAccount]);

  useEffect(() => {
    if (null === remToAccount) return;
    axios
      .put(
        'http://testcrudreact.lt/listJsonRem/' + remToAccount.id,
        remToAccount
      )
      .then((res) => {
        setMessage(res.data.msg);
        setStyleCreateList(res.data.style);
        setLastUpdate(Date.now());
      });
  }, [remToAccount]);

  return (
    <DataContext.Provider
      value={{
        account,
        createAccount,
        setCreateAccount,
        setDeleteAccount,
        modalAccount,
        setModalAccount,
        setAddToAccount,
        modalAccountRem,
        setModalAccountRem,
        setRemToAccount,
        message,
        messageCreate,
        setMessage,
        setMessageCreate,
        styleCreate,
        styleCreateList,
        modalCreate,
        setModalCreate,
      }}
    >
      <div className="container">
        <div className="row">
          <Create />
          <List />
        </div>
      </div>
      <Add />
      <Remove />
    </DataContext.Provider>
  );
}

export default App;
