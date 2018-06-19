import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LastWillAndTestamentComponent } from './last-will-and-testament.component';

describe('LastWillAndTestamentComponent', () => {
  let component: LastWillAndTestamentComponent;
  let fixture: ComponentFixture<LastWillAndTestamentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LastWillAndTestamentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LastWillAndTestamentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
