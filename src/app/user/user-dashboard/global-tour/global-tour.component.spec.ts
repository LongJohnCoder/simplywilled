import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GlobalTourComponent } from './global-tour.component';

describe('GlobalTourComponent', () => {
  let component: GlobalTourComponent;
  let fixture: ComponentFixture<GlobalTourComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GlobalTourComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GlobalTourComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
