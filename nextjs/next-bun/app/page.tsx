import Image from "next/image";
import Link from "next/link";

export default function Home() {
  return (
    <main className="min-h-screen">
      <p>home page</p>
      <Link className="text-blue-600" href={"/dashboard"}>
        dashboard
      </Link>
    </main>
  );
}
