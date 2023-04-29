import { Link, Head } from '@inertiajs/react';
import logo from '../../images/Mainlogo.png';
import GithubLogo from '../../images/dashboard/github.svg';
import Button from '../Components/Button/Button';
import pr from '../../images/pr.png';

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
            <div className="main-div bg-gray-300 drop-shadow-xl mx-auto mt-5 max-w-8xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32 ">
                <h1 className="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
                    "Junior developer? Get a senior mentor to guide you to success."
                </h1>
                <p className="mx-auto mt-6 max-w-2xl text-xl tracking-tight text-slate-700">
                    "Our platform links you with senior developers and offers a supportive community."
                </p>
                <div className="mt-10 flex justify-center gap-x-6">
                    <a className="group inline-flex items-center justify-center" href="/register">
                        <Button
                            size="w-8"
                            text="Join us on Discord"
                            color="invert-0"
                            logo={GithubLogo}
                            alt="Logo Github"
                        />
                    </a>
                    <a
                        className="inline-flex items-center justify-center rounded-full py-2 px-4 text-lg"
                        href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    >
                        <Button size="w-6" text="Make your first Pull Request" divers={true} logo={pr} />
                    </a>
                </div>
            </div>
        </>
    );
}
