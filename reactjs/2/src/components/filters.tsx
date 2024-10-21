import React, { useEffect, useState } from "react";
import _ from "lodash";


const database: Member[] = [
    { name: "Manel Ratne", role: "student" },
    { name: "Nimal Guna", role: "teacher" },
    { name: "Kamal Gune", role: "student" },
    { name: "Meena Sai", role: "teacher" },
    { name: "Kumar Pathi", role: "student" },
    { name: "Ram Pathil", role: "teacher" },
    { name: "Pam Neeha", role: "teacher" },
]

type Member = {
    name: string,
    role: "student" | "teacher"
}

interface IFilters {
    role: ("student" | "teacher")[]
}

export default function Filters() {

    const [members, setMembers] = useState<Member[]>([]);
    const [search, setSearch] = useState<string>("")
    const [filters, setFilters] = useState<IFilters>({
        role: []
    })

    useEffect(function () {

        function setData() {
            setMembers(database)
        }
        setData()

        return setData
    }, [])


    let data = members

    if (search) {
        data = data.filter(item => item.name.toLowerCase().includes(search.toLowerCase()))
    }

    if (filters.role.length > 0) {
        data = data.filter(item => filters.role.includes(item.role))
    }

    console.log('rendered');
    console.log(filters);


    return (
        <div style={{ padding: 20 }}>

            <input value={search} onChange={e => setSearch(e.target.value)} type="text" placeholder="search..." style={{ padding: 8 }} />

            <br />
            <br />
            <input id="filter-teacher" onChange={e => e.target.checked ? setFilters(filters => { return { ...filters, role: _.union(filters.role, ["teacher"]) } }) : setFilters(filters => { return { ...filters, role: [...filters.role, "student"] } })} type="checkbox" style={{ margin: 10, padding: 8 }} />
            <label htmlFor="filter-teacher">Filter out teachers</label>

            <input id="filter-student" onChange={e => e.target.checked ? setFilters(filters => { return { ...filters, role: _.union(filters.role, ["student"]) } }) : setFilters(filters => { return { ...filters, role: _.without(filters.role, "student") } })} type="checkbox" style={{ margin: 10, padding: 8 }} />
            <label htmlFor="filter-student">Filter out students</label>

            <ol>
                {data.map((item, index) =>
                    <li key={index}> {item.name} - {item.role}</li>
                )}

            </ol>
        </div>
    )

}