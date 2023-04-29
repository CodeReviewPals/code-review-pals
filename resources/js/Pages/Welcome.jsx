import { Link, Head } from '@inertiajs/react';
import logo from '../../images/Mainlogo.png';
import GithubLogo from '../../images/dashboard/github.svg';
import Button from '../Components/Button/Button';

import { Title } from '@/Components/Title/Title';
import './style.css';

export default function Welcome({ auth, title }) {
    const returnAuthHeaderBtn = () => {
        if (auth.user) {
            return (
                <Link href={route('dashboard')}>
                    <Button size="w-6" text="Dashboard" color={'invert'} logo={logo} />
                </Link>
            );
        }
        return (
            <a href={route('socialite.redirect', 'github')}>
                <Button size="w-8" text="Login" color="invert-0" logo={GithubLogo} />
            </a>
        );
    };

    return (
        <>
            <Head title={title} />
            <header className="flex items-center justify-between mx-4 mt-2">
                <div className="title flex items-center">
                    <img className="w-16" src={logo} alt="Logo code reviews pals" />
                    <Title />
                </div>
                <nav>{returnAuthHeaderBtn()}</nav>
            </header>
            <div className="bg-gray-300 drop-shadow-xl mx-auto mt-5 max-w-7xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32">
                <h1 className="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
                    "Junior developer? Get a senior mentor to guide you to success."
                </h1>
                <p className="mx-auto mt-6 max-w-2xl text-xl tracking-tight text-slate-700">
                    "Our platform links you with senior developers and offers a supportive community."
                </p>
                <div className="mt-10 flex justify-center gap-x-6">
                    <a
                        className="group inline-flex items-center justify-center rounded-full py-2 px-4 text-lg font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 active:bg-slate-800 active:text-slate-300 focus-visible:outline-slate-900"
                        href="/register"
                    >
                        Look around
                    </a>
                    <a
                        className="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-lg focus:outline-none ring-slate-200 text-slate-700 hover:text-slate-900 hover:ring-slate-300 active:bg-slate-100 active:text-slate-600 focus-visible:outline-blue-600 focus-visible:ring-slate-300"
                        href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    >
                        <svg aria-hidden="true" className="h-3 w-3 flex-none fill-blue-600 group-active:fill-current">
                            <path d="m9.997 6.91-7.583 3.447A1 1 0 0 1 1 9.447V2.553a1 1 0 0 1 1.414-.91L9.997 5.09c.782.355.782 1.465 0 1.82Z"></path>
                        </svg>
                        <span className="ml-3">Learn how to start</span>
                    </a>
                </div>
            </div>
        </>
    );
}
