import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css'
import StopWatch from './StopWatch.jsx'
import Table from './Table/Table.jsx'
import Transition from './Transition'

ReactDOM.createRoot(document.getElementById('root')).render(
  // <React.StrictMode>
  // <App />
  // <StopWatch />
  // <Table />
  <Transition />
  // </React.StrictMode>,
)
