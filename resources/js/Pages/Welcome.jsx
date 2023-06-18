import { Link, Head } from '@inertiajs/react';
import logo from '~/images/main-logo.png';
import GithubLogo from '~/images/dashboard/github.svg';
import pr from '~/images/pr.png';
import arrow from '~/images/arrow.svg';
import DiscordLogo from '~/images/discord.svg';

import { Title } from '@/Components/Title/Title';
import './style.css';

export default function Welcome({ auth, title }) {
    const returnAuthHeaderBtn = () => {
        if (auth.user) {
            return (
                <Link href={route('dashboard')}>
                    <button className="bg-main-white text-black font-bold py-2 px-4 rounded border">
                        Dashboard
                        <img src={arrow} className="inline-block ml-2" />
                    </button>
                </Link>
            );
        }
        return (
            <a href={route('socialite.redirect', 'github')}>
                <button className="bg-main-white text-black font-bold py-2 px-4 rounded border">
                    <img
                        className="inline-block mr-2 w-6 invert"
                        src={GithubLogo}
                        alt="login with github"
                    />
                    Login
                </button>
            </a>
        );
    };

    return (
        <>
            <Head title={title} />
            <header className="flex items-center justify-between mx-4 mt-2">
                <div className="main-text-white uppercase text-3xl flex items-center">
                    <img className="w-16 invert" src={logo} alt="Logo code reviews pals" />
                    <Title />
                </div>
                <nav>
                    <Link href="https://discord.gg/6hPQZb7bat">
                        <button className="bg-transparent main-text-white font-bold py-2 px-4 rounded ">
                            Join our Discord
                        </button>
                    </Link>
                    {returnAuthHeaderBtn()}
                </nav>
            </header>
            <div className="main-div mx-auto mt-5 max-w-8xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32 ">
                <h1 className="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight main-text-white sm:text-7xl">
                    "Junior developer? Get a <b className="text-gradient">senior mentor</b> to guide
                    you to success."
                </h1>
                <p className="mx-auto mt-6 max-w-2xl text-xl tracking-tight main-text-white">
                    "Our platform links you with senior developers and offers a supportive
                    community."
                </p>
                <div className="mt-10 flex justify-center gap-x-6">
                    <a
                        className="group inline-flex items-center justify-center"
                        href="https://discord.gg/6hPQZb7bat"
                    >
                        <button className="bg-transparent font-bold py-2 px-4 rounded border main-text-white h-12">
                            <img
                                className="inline-block mr-2 w-7 invert"
                                src={DiscordLogo}
                                alt="discord logo"
                            />
                            Join on Discord
                        </button>
                    </a>
                    <a
                        className="inline-flex items-center justify-center rounded-full py-2 px-4 text-lg"
                        href="https://github.com/codeReviewPals/code-review-pals/"
                    >
                        <button className="bg-gradient text-black font-bold py-2 px-4 rounded border h-12">
                            <img
                                className="inline-block mr-2 w-5 invert"
                                src={GithubLogo}
                                alt="github"
                            />
                            Share your first PR
                        </button>
                    </a>
                </div>

                {/* <div>
                    <img src={arrow} className="invert m-auto mt-28 rotate-90 w-5" />
                </div> */}
            </div>
            {/* TODO based on design */}
            <footer className="mt-28">
                <h3 className="main-text-white text-3xl text-center font-bold">
                    Join the code review{' '}
                    <b className="text-primary font-bold ">at a bigger scale</b>
                </h3>
                <div className="flex mt-9 flex-row justify-center">
                    <div className="flex flex-col mx-2">
                        <button className="bg-main-white text-black font-bold py-2 px-4 rounded border">
                            <img
                                className="inline-block mr-2 w-6"
                                src={DiscordLogo}
                                alt="Join Discord"
                            />
                            Discord
                        </button>
                    </div>
                    <div className="flex flex-col mx-2">
                        <button className="bg-main-white text-black font-bold py-2 px-4 rounded border">
                            <img
                                className="inline-block mr-2 w-6 invert"
                                src={GithubLogo}
                                alt="Github"
                            />
                            Github
                        </button>
                    </div>
                </div>
                <h6 className="text-center main-text-white my-9">CodeReviewPals ©2023</h6>
            </footer>
        </>
    );
}
